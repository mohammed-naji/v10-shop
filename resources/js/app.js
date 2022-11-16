import './bootstrap';
var userId = 1;
Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
        // console.log(notification);
        toastr.success(notification.data)

    });
