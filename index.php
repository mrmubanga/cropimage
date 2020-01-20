<script src="jquery-3.3.1.min.js"></script>
<script src="cropper.js"></script>

<link rel="stylesheet" type="text/css" href="cropper.css">
<div id="image1">
<img src="adnan-afzal.jpg" style="width: 150px;"name=".png" id="image">
</div>
<script>
	$(function () {
		$("#image").cropper({
			zoomable: true
		});
	});

	function crop() {
		$("#image").cropper("getCroppedCanvas").toBlob(function (blob) {
			var formData = new FormData();
			formData.append("croppedImage", blob);

			$.ajax({
				url: "upload.php",
				method: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					alert(response);
				}, error: function (xhr, status, error) {
					console.log(status, error);
				}
			});
		});
	}
</script>

<style>
	.cropper-crop {
		display: none;
	}
	.cropper-bg {
		background: none;
	}
</style>

<button type="button" onclick="crop();">
	Crop
</button>