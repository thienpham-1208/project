$(function() {

    $('#avatar').click(function() {
        $('#img').click();
    });
    $('#img').change(function(e) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    })
});
