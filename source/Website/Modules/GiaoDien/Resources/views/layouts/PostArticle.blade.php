@extends('giaodien::layoutMaster')

@section('content')

<form class="PostArticleForm form-group" method="post" action="/post-article">
	@csrf
	<div class="container">
		<div class="row">
			<div class="title col-2 "><h5>Tiêu Đề: </h5></div>
			<div class="col-10">
				<input type="text" name="ArticleTitle" class="input-group form-control">
			</div>
		</div>

		<div class="row">
			<div class="title col-2 "><h5>Nội Dung: </h5></div>
			<div class="col-10">
				<div id="editor"></div>
				<input type="text" id="EditorContent" style="display: none;" name="ArticleContent">
			</div>
		</div>

		<div class="row">
			<div class="title col-2 "><h6>Người Đăng: </h6></div>
			<div class="col-10">
				<input type="text" name="ArticleAuthor" class="input-group form-control w-25">
			</div>
		</div>

		<div class="row">
			<div class="col-10"></div>
			<div class="col-2 btnSubmit">
				<input type="button" class="btn btn-group btn-success" value="Đăng bài" onclick="SubmitForm()">
				<input type="submit" style="display: none;" name="PostFormSubmit">
			</div>
		</div>

		
	</div>
</form>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor' );
</script>
<script>

	

	function SubmitForm(){
		
		var html = CKEDITOR.instances.editor.getData();
		
		$('#EditorContent').val(html);
		var content = $('#EditorContent').val();
		var Author = $('input[name="ArticleAuthor"]').val();
		var Title = $('input[name="ArticleTitle"]').val();

		if(content==""||Author==""||Title==""){
			alert("chưa nhập đủ thông tin");
		}
		else{
		event.target.parentNode.querySelector('input[name="PostFormSubmit"]').click();
						
		}
	}
</script>

@endsection