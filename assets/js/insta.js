function getInstaProfile(username, callback) {
  xhr = new XMLHttpRequest();

  xhr.onload = function (e) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        try {
          var data = xhr.responseText.split("window._sharedData = ")[1].split("<\/script>")[0];
        } catch (error) {
          console.error("InstagramFeed: It looks like the profile you are trying to fetch is age restricted", error);
          return;
        }
        data = JSON.parse(data.substr(0, data.length - 1));
        data = data.entry_data.ProfilePage || data.entry_data.TagPage;
        if (typeof data === "undefined") {
          console.error("InstagramFeed: It looks like YOUR network has been temporary banned because of too many requests.");
          return;
        }
        data = data[0].graphql.user || data[0].graphql.hashtag;
        callback(data)
      } else {
        console.error("InstagramFeed: Unable to fetch the given user/tag. Instagram responded with the status code: " + xhr.statusText);
      }
    }
  };
  xhr.open("GET", 'https://www.instagram.com/' + username + '/?__a=1', true);
  xhr.send();
};

function getInstaFeed(username, image_sizes_index, callback) {

  var image_sizes = {
    "150": 0,
    "240": 1,
    "320": 2,
    "480": 3,
    "640": 4
  };

  var image_index = image_sizes[image_sizes_index];
  getInstaProfile(username, (data) => {
    let posts = [];
    data.edge_owner_to_timeline_media.edges.forEach(post => {
      post = post.node

      let _post = {
        url: "https://www.instagram.com/p/" + post.shortcode,
        type_resource: null,
        image: null,
        aspectRatio: post.dimensions.width / post.dimensions.height
      }

      switch (post.__typename) {
        case "GraphSidecar":
          _post.type_resource = "sidecar"
          _post.image = post.thumbnail_resources[image_index].src;
          break;
        case "GraphVideo":
          _post.type_resource = "video";
          _post.image = post.thumbnail_src
          break;
        default:
          _post.type_resource = "image";
          _post.image = post.thumbnail_resources[image_index].src;
      }
      posts.push(_post);
    });

    callback(posts)
  })
}



window.addEventListener('DOMContentLoaded', (event) => {
  getInstaFeed('zaosoula', '640', (data) => {
    let cols = document.querySelectorAll('.works-col[data-source=insta]')
    data.forEach((post, i) => {
      var postDiv = document.createElement("div");
      postDiv.classList.add('works-item');
      postDiv.style.setProperty('--aspect-ratio', 1);
      postDiv.style.backgroundImage = 'url(' + post.image + ')';
      postDiv.addEventListener('click', () => {
        window.open(post.url, '_blank');
      });

      cols[i % cols.length].append(postDiv);
    })
  });
});