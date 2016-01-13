/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $('.like').click(function(){
        //return false;
         var like = parseInt($(this).find('span').text());
        $.ajax({
            type: 'POST',
            url:  'http://localhost/youthpower/youth/index.php/usercomments/usercomments/' + 'likeComment',
            dataType: "json",
            data: {commentId: this.id},
            success: function (res) {
                console.log(res);
                if(res.status==='success')
                {
                   //$(this).find('span').text()= like +1;
                }
                
            }
        });
    });
   