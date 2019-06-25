<head>
  <title>Edit - <?php echo $this->page_title ?></title>
</head>
<body>

<form action="/pont/inc/post.php">
<input name="page_id" type="hidden"value="<?php echo $this->page_id ?>">
<a href="?view=display&page=<?php echo $this->page_id ?>">Display</a>

  <?php

  $this->print_modules();
  //$this->print_modules();

  ?>
<input type="submit">Save</input>
</form>
</body>
