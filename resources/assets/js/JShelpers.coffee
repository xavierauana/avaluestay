helpers = ->
  getQueryString: ->
    name = window.location.href.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    regex = new RegExp("[\\?&]" + name + "=([^&#]*)")
    results = regex.exec location.search
    if results is null then "" else decodeURIComponent results[1].replace(/\+/g, " ")
