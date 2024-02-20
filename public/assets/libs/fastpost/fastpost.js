function fastPost(url, data, redirectUrl = null) {
    axios.post(url, data)
        .then(function(response) {
            // Başarılı cevap durumunda toastr ile mesaj gösterme
            toastr[response.data.type](response.data.message);

            // Başarılı ise yönlendirme veya sayfa yenileme yap
            if (response.data.status) {
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                } else {
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                }
            }
        })
        .catch(function(error) {
            // Hata durumunda toastr ile hata mesajı gösterme
            toastr.error('An error occurred: ' + error);

            console.error(error);
        });
}

// Dışa aktar
export default fastPost;
