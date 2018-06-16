<footer class="footer">
    <span class="text-muted">Copyright © 2018, O' Savon</span>
</footer>

<script>
    function detailsmodal(id){
        var data = {"id" : id};
        jQuery.ajax({
            url : "/osavon/includes/detailsmodal.php",
            method : "post",
            data : data,
            success: function(data){
                jQuery('body').append(data);
                jQuery('#details-modal').modal('toggle');
            },
            error: function(){
                alert("Oh no! Something went wrong!");
            }
        });

    }
</script>
  </body>
</html>