
    function deleteItem(host,id){
         var r = confirm("Dữ liệu ID "+id+" sẽ bị xóa..? Xác nhận.!");
         if (r == true) {
            $.ajax({
              type: "post",
              url: host,
              success: function( msg ) {
                 location.reload();
              }
          });
         }
      }