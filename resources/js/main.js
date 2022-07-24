function submit() {
    let input = $("#input-url");
    let url = input.val();
    $.get(`/api/url/create?url=${url}`, function (result) {
        input.val(result);
        input[0].select();
        document.execCommand("copy");
    });
}