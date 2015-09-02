if document.getElementsByClassName("conversations").length > 0
  conversations = new Vue
    el: ".conversations"
    data:
      senderId: ""
      receiverId: ""
    methods:
      messageStream: ->
        self = this
        $.ajax
          url: "/messages/sender/" + this.receiverId + "/receiver/" + this.senderId
          method: "GET"
        .success (data)->
          data.map (message)->
            self.stickOthersMessageOnBoard(message.message)
          console.log data
        .always ->
          console.log "ajax fire"

      stickMyMessageOnBoard: (message)->
        template = $(".mine.hidden").clone().removeClass "hidden"
        template.find("p").text message
        template.find("small p").text "now"
        template.appendTo "div.messageBox"
        $('.messageBox').animate
          "scrollTop": $('.messageBox')[0].scrollHeight
          "slow"

      stickOthersMessageOnBoard: (message)->
        template = $(".sender.hidden").clone().removeClass "hidden"
        template.find("p").text message
        template.find("small p").text "now"
        template.appendTo "div.messageBox"
        $('.messageBox').animate
          "scrollTop": $('.messageBox')[0].scrollHeight
          "slow"

      newMessage: (e)->
        e.preventDefault()
        message = e.target.message.value
        if message
          this.stickMyMessageOnBoard(message)
          form = $(e.target)
          token = $('meta[name="csrf-token"]').attr 'content'
          $.ajaxSetup
            headers:
              'X-CSRF-TOKEN': token
          $.ajax
            url: form.attr "action"
            method: form.attr "method"
            data: form.serialize()
          .success (data)->
            console.log data

        e.target.message.value = ""

    ready: ->
      temp = $("form").attr("action").split("/")
      this.senderId = temp[3];
      this.receiverId = temp[5];
      #      setInterval(this.messageStream, 10*1000)
      $('.messageBox').animate
        "scrollTop": $('.messageBox')[0].scrollHeight
        "fast"
