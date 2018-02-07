<!DOCTYPE html>
<html>
  <head>
    <title>EdPortal</title>
  <body>
    <?php
    /* DISPLAYS MESSAGE FOR WHEN UPLOADING/REMOVING A FILE */
    if (isset($_GET['message'])) {
      $message = $_GET['message'];
      switch($message) {
        case "success":
          $message = "File succesfully uploaded!";
          break;
        case "fail":
          $message = "File not uploaded, something went wrong.";
          break;
        case "notunique":
          $message = "File has already been uploaded.";
          break;
        case "removed":
          $message = "File has succesfully been removed.";
          break;
        }
      echo "<body onload=\"document.getElementById('messagePopup').style.display='inline-block'\">";
    }
    else {
      echo "<body>";
    }

    require_once "filedisplay.php";
    ?>

    <form action="upload.php" method="POST" id="uploadForm" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="animate">
        <div id="information">
          <span onclick="document.getElementById('uploadForm').style.display='none'" class="close" title="Close Modal">&times;</span>
          <h1><u>Upload file.</u></h1>
        </div>
        <div id="upload">
          <input type="hidden" name="MAX_FILE_SIZE" value="25000000">
          <h4>Please select a file.</h4>
          <input type="file" name="userFile"><br>
          <h4>Please select a tag.</h4>
          <select name="tag" size="1">
            <option value="text", name="text">Text</option>
            <option value="image", name="image">Image</option>
            <option value="coding", name="coding">Coding</option>
            <option value="video", name="video">Video</option>
          </select><br><br>
          <button type="submit" id="uploadSubmit">Submit</button>
        </div>
      </div>
    </form>

    <div id="messagePopup">
      <div class="popup-content animate">
        <span onclick="document.getElementById('messagePopup').style.display='none'" class="close" title="Close Popup">&times;</span>
        <h1><?php if(isset($message)) echo $message;?></h1>
      </div>
    </div>

    <div id="filePopup">
      <div id="information">
        <span onclick="document.getElementById('filePopup').style.display='none'" class="close" title="Close Popup">&times;</span>
        <h1 id="fileName"></h1>
      </div>
      <div class="buttons">
        <form method="POST" action="file_functions.php">
          <input type="hidden" name="href" id="fileDown">
          <input type="hidden" name="mode" value="download">
          <button type="submit" class="optionButton">DOWNLOAD</button>
        </form>
        <form method="POST" action="file_functions.php">
          <input type="hidden" name="href" id="fileRem">
          <input type="hidden" name="mode" value="remove">
          <button type="submit" class="optionButton">REMOVE</button>
        </form>
      </div>
    </div>

    <footer class="container">
      <div class="row text-center">
        <h1 class="col-sm-12 text-center" style="background-color:#222; color: white; border: 2px solid black;">© EdPortal Inc. (Totally verified)</h1>
      </div>
    </footer>

    <script>
    function getFileForm(name, href) {
      document.getElementById('filePopup').style.display = 'inline-block';
      document.getElementById('fileName').innerHTML = name;
      document.getElementById('fileDown').setAttribute('value', href);
      document.getElementById('fileRem').setAttribute('value', href);
    }
    </script>
  </body>
</html>
