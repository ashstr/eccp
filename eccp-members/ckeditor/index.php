<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>CKFinder - Sample - CKEditor</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<link href="sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <h1>
 CKFinder - Sample - CKEditor
 </h1>
<br>
	<textarea name="CKEditor1" rows="8" cols="60">
	<div align="right">
	     اضغط على ايقونة صورة ثم اختار تصفح
	</div>
	</textarea>
<script type="text/javascript" src="ckeditor.js?t=A06B"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'CKEditor1',
{
	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '800',
 	filebrowserWindowHeight : '700',
 	language : 'ar'
});
</script>

</body>
</html>