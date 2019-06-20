<head>
  <title>Edit - <?php echo $this->page_title ?></title>
</head>
<body>

<form action="/pont/inc/post.php">
<input name="page_id" type="hidden"value="<?php echo $this->page_id ?>">
<a href="/pont/?view=display">Display</a>

  <?php

  $this->get_modules();
  $this->print_modules();

  ?>
<input type="submit">Save</input>
</form>
</body>
