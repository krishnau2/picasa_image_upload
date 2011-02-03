$(document).ready(function(){
    $('#billDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#grDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#createdDate').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#supplierName').focus();

    $('#save').click(function(){
        if(!$('#supplierName').val()){
            alert("Supplier Name is required")
        }
        if(!$('#billNo').val()){
            alert("Bill no is required")
        }
    })
});