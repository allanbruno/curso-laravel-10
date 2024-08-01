function deleteRegistroPaginacao(rotaUrl, idRegistro) {
    if (confirm('Deseja realmente excluir esse registro?')) {
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: idRegistro
            },
            beforeSend: function () {
                $.blockUI({
                    message: 'Excluindo...',
                    timeout: 2000
                });
            },
        }).done(function (data) {
            $.unblockUI();
            console.log(data);
        }).fail(function (data) {
            $.unblockUI();
            alert('Não foi possível buscar os dados');
        });
    }
}