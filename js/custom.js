//********PROJECT RELATED STUFF
//get repo lines of codes stats
if (document.getElementById('git-count')){
  var git = document.getElementById('git-count');
  var repo = git.getAttribute('data-repo');
  //console.log(git);

  var gitUrl = 'https://api.github.com/repos/rva-alt-lab/'+repo+'/languages';

  fetch(gitUrl).then(function(response) {
    var contentType = response.headers.get("content-type");
    if(contentType && contentType.indexOf("application/json") !== -1) {
      return response.json().then(function(json) {
        // process your JSON further
        var data = json;
        if (json.message == 'Not Found') {
          git.innerHTML = 'N/A';
        } else {
        if (json.PHP){
           var php = json.PHP;
          }
        if (json.JavaScript){
         var js = json.JavaScript;
        }
        if (json.CSS){
         var css = json.CSS;
       }
         git.innerHTML = php + js + css;
        }
      });
    } else {
      console.log("Oops, we haven't got JSON!");
    }
  });
}

//GOOGLE DRIVE STUFF - sets drive folders
if (document.getElementById('gdrive-count')){
  var gdrive = document.getElementById('gdrive-count');
  var project = gdrive.getAttribute('data-hash');


  //var days = document.getElementById('day-count');

  var gUrl = "https://spreadsheets.google.com/feeds/list/1gIMlXBhURcZZ998ODnV8JRTUh9S6f_AB0jkBGSnateI/2/public/values?alt=json"; //this is the part that's changed

  fetch(gUrl).then(function(response) {
    var contentType = response.headers.get("content-type");
    if(contentType && contentType.indexOf("application/json") !== -1) {
      return response.json().then(function(json) {
        // process your JSON further
        if (json.feed.entry){
          var data = json.feed.entry;
          for (i = 0; i < data.length; i++) {
            if (data[i].gsx$project.$t == project) {
              console.log(data[i].gsx$project.$t + ' ~ ' + project + ' * ' + data[i].gsx$files.$t);
              gdrive.innerHTML = data[i].gsx$files.$t;
              //daysAlive(data[i].gsx$inception.$t);
            }
          }
        }
      })
    } else {
      gdrive.innerHTML = 'N/A';
    }
  });
}

function daysAlive (inception){
  var birth = new Date(inception)
  var timeDiff = Math.abs(now.getTime() - birth.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    console.log(diffDays);
   days.innerHTML = diffDays;
}

//General scripts


//Matt's scroll link thingy
jQuery(document).ready(function() {
  jQuery('.question a').click(function(event){
    event.preventDefault();
    jQuery('html, body').animate({
        scrollTop: jQuery( jQuery(this).attr('href') ).offset().top
    }, 1500);
    return true;
  });
});

jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip()
})