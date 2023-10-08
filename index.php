<?php
 if(isset($_POST["upload"])){
   updateAPK($id);
}
?>

<form method="POST" role="form" enctype="multipart/form-data">
<div class="form-group">
<label for="application">select APK :</label>
<input type="file" name="application" id="application" class="form-control" required/>
<div align="center">
<button type="submit" name="upload" value="upload" class="btn btn-default">upload</button>
</div>
</div>
</form>
<script>
    function updateAPK($id){

   $name = $id.".apk";
   $temp = $_FILES["application"]["tmp_name"];
   $extension = array("application/octet-stream","application/vnd.android.package-archive");
   $DIR = __DIR__."\\..\\android\\{$id}\\";

    // apk format validation
    if(in_array($_FILES["application"]["type"],$extension )){

        //create directory if not exist
        if(!dirExist($DIR)){
            createDir($DIR);
        }

        if(move_uploaded_file($temp,$DIR."\\{$name}")){
            return true;
        }
    }
    return false;
}
</script>
