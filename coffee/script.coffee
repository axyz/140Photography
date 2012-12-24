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

#$ ->
#  hash = window.location.hash.slice 1
#  loadTweets 'Photography News', '#tweetFeed', tweetQuery["Photography News"][0], tweetQuery["Photography News"][1], 15
#  for e of tweetQuery
#    $("#menu ul").append "<li id=\"" + e + "\"><a href=\"#\" >" + e + "</a></li>"
#    $("#menu-mobile select").append "<option id=\"" + e + "\"><a href=\"#\" >" + e + "</a></option>"
#    $("#menu li").first().addClass "active"
#  $("#menu li").click ->
#    $("#menu li").removeClass "active"
#    $(@).addClass "active"
#    $("#menu-mobile select").val($(@).attr("id"))
#    loadTweets $(@).attr("id"), "#tweetFeed", tweetQuery[$(@).attr("id")][0], tweetQuery[$(@).attr("id")][1], 15
#  $("#menu-mobile select").change ->
#    loadTweets $(@).val(), "#tweetFeed", tweetQuery[$(@).val()][0], tweetQuery[$(@).val()][1], 15

# Knockout.js

Section = (data) ->
  @title = ko.observable data.title
  @user = ko.observable data.user
  @list = ko.observable data.list
  return

AppViewModel = ->
  self = @
  @sections = ko.observableArray []
  @activeSection = ko.observable()

  @loadTweets = () ->
    loadTweets self.activeSection().title(), "#tweetFeed", self.activeSection().user(), self.activeSection().list(), 15

  $.getJSON "data/section.json", (data) ->
    for el in data
      do (el) ->
        self.sections.push(new Section el)
        return
    self.activeSection(self.sections()[0])
    return

  @loadList = (list) ->
    location.hash = "list/" + @.list()
    return

  # route

  Sammy(->
    @get "#list/:section", ->
      me = @
      id = ko.utils.arrayFirst(self.sections(), (el) ->
        return el.list() == me.params.section)
      self.activeSection(id)
      self.loadTweets()

    @get "", ->
      @app.runRoute "get", "#list/news"

  ).run()

  return

ko.applyBindings new AppViewModel()

