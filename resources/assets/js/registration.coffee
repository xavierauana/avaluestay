if document.getElementById "registration"
  registration = new Vue
    el: "#registration"
    data:
      currentTab: null
    methods:

      deleteItem: (e)->
        button = e.target
        url = e.target.dataset.url
        objectId = e.target.dataset.id
        token =  $('meta[name="csrf-token"]').attr 'content'
        if objectId
          $.ajaxSetup
          headers:
            'X-CSRF-TOKEN': token

          $.ajax
            url: "/" + url + "/" + objectId
            method: "delete"
          .success (data)->
            $(button).parents(".completedSet").remove() if data.response is "completed"
        else
          $(button).parents(".completedSet").remove()





      getProperty: ->
        self = this
        id = window.location.pathname.replace("/properties/next/","")
        $.ajax
          url: "/properties/"+id
          dataType:'json'
        .success (data)->
          self.$set("property", data)
          console.log(data)
        return true

      submit: ()->
        forms = $("#"+this.currentTab).find "form.autoSubmit"
        if forms
          token =  $('meta[name="csrf-token"]').attr 'content'
          $.ajaxSetup
            headers:
              'X-CSRF-TOKEN': token

          console.log(forms);
          forms.map (index, DomForm)->
            console.log(DomForm);
            form = $(DomForm)
            url = form.attr "action"
            method = form.attr "method"
            console.log url, method, token
            request = $.ajax
              url: url
              method: method
              data: $(form).serialize()
              dataType: "json"

            request.success (data)->
              console.log data

            return ""

        return ""


      resetActiveTab: (e)->
        $("#"+this.currentTab).removeClass "active";

        this.submit()

        this.currentTab = e.target.dataset.tab
        $("#"+this.currentTab).addClass "active"

      addMoreService: (e) ->
        e.preventDefault()
        template = $("fieldset.hidden").clone().removeClass().addClass "completedSet"
        $(e.target).before template
        return false

    ready: ->
      this.currentTab = "basic"
      this.getProperty()
      $("#"+this.currentTab).addClass "active"
      console.log "vue ready"
      console.log $("a[role='tab']")