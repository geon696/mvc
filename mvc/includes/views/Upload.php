<?php 
if (isset($_POST['submit'])) {
	Upload::uploadstory($_FILES);
}
?>
<div id="container">
	<div class="content">
		<article class="mainArticle">
			<form class="upload" action="upload" method="POST" enctype="multipart/form-data">
				<input type="file" name="files[]" multiple="" />
				<input type="submit" name="submit" id="submit"/>
			</form>
		</article>
	</div>
</div>