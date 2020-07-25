$(get_registers());

function get_registers(alumnos)
{
    $.ajax({
        url:'query.php',
        type: 'POST',
        dataType: 'html',
        data: { alumnos: alumnos},
    })
    .done(function(result){
        $('#result_table').html(result);

    })
}
$(document).on('keyup','#search',function()
{
    var SearchValue=$(this).val();
    if (SearchValue!="")
    {
        get_registers(SearchValue);
    }
    else {
        get_registers();
    }
});
