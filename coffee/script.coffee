loadTweets = (title, div, users, list, n) ->
  $("#deck").html "<h2>" + title + "</h2>"
  $("#deck").append "<div id=\"tweetFeed\"></div>"
  $(div).html ""
  $(div).jTweetsAnywhere
    username: users
    list: list
    count: n
    showTweetFeed:
      showProfileImages: true
      showUserScreenNames: true
      showUserFullNames: true
      showActionReply: true
      showActionRetweet: true
      showActionFavorite: true
      autorefresh:
        mode: "trigger-insert"
        interval: 300

      paging:
        mode: "more"

      showTimestamp:
        refreshInterval: 60

$ ->
  hash = window.location.hash.slice 1
  loadTweets 'Photography News', '#tweetFeed', tweetQuery["Photography News"][0], tweetQuery["Photography News"][1], 15
  for e of tweetQuery
    $("#menu ul").append "<li id=\"" + e + "\"><a href=\"#\" >" + e + "</a></li>"
    $("#menu-mobile select").append "<option id=\"" + e + "\"><a href=\"#\" >" + e + "</a></option>"
    $("#menu li").first().addClass "active"
  $("#menu li").click ->
    $("#menu li").removeClass "active"
    $(@).addClass "active"
    $("#menu-mobile select").val($(@).attr("id"))
    loadTweets $(@).attr("id"), "#tweetFeed", tweetQuery[$(@).attr("id")][0], tweetQuery[$(@).attr("id")][1], 15
  $("#menu-mobile select").change ->
    loadTweets $(@).val(), "#tweetFeed", tweetQuery[$(@).val()][0], tweetQuery[$(@).val()][1], 15

