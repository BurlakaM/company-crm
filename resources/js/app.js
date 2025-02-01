import './bootstrap';
import $ from 'jquery';
import DataTable from 'datatables.net-bs5';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';
import Inputmask from 'inputmask';
$(document).ready(function() {
    $('[data-table]').DataTable({
        responsive: true,
        paging: false,
        info: false
    });
    function handleImagePreview(inputElement) {
        var target = $(inputElement).data('target');
        var container = $('[data-target="'+ target +'"]');
        var preview = container.find('.image-preview');
        var placeholder = container.find('.image-placeholder');
        var img = container.find('.preview-img');

        var file = inputElement.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                img.attr('src', reader.result);
                preview.show();
                placeholder.hide();
            };
            reader.readAsDataURL(file);
        } else {
            preview.hide();
            placeholder.show();
        }
    }
    $('.custom-file-input').on('change', function(event) {
        handleImagePreview(event.target);
    });
    $('input[name="phone"]').each(function() {
        Inputmask("+99-999-999-9999").mask(this);
    });
});
