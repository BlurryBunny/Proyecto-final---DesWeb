

<?php 
echo "
<form action='../../DB/registerNewComment.php' enctype='multipart/form-data' class='form-post' method='post'>
<input type='hidden' value='. $_GET['idPost'].   ' name='txtIdPost'>
<div class='row mt-5'>
    
    <div class='col-1'></div>
    <div class='col-8'>
         <textarea name='txtComentario' id='txtComentario' class='form-control' aria-label='With textarea' placeholder='¿Que opinas?'></textarea>                    
    </div>
    <div class='col-2'>
        <input type='submit'  id='btn-Publicar' class='btn btn-primary' value= 'Comentar' >
    </div>
    <div class='col-1'></div>
        
</div>
";
?>