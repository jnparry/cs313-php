function pictureChange() {
    var currentImage = document.getElementById("homeImg");
    if (currentImage.src == "https://scontent-sea1-1.xx.fbcdn.net/v/t1.0-9/22196364_1531234120303010_5342914097511881599_n.jpg?_nc_cat=0&oh=6294f300d8cbce483acf9510b3fc4cf9&oe=5B5649E6") {
        currentImage.src = "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22219795_1531234030303019_8440193529481968587_o.jpg?_nc_cat=0&oh=fcedb28ced5c7c4d5bf1f104e6d8e473&oe=5B5F3A99"
    }
    else if (currentImage.src == "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22219795_1531234030303019_8440193529481968587_o.jpg?_nc_cat=0&oh=fcedb28ced5c7c4d5bf1f104e6d8e473&oe=5B5F3A99") {
        currentImage.src = "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22181651_1531234033636352_8512348432796818873_o.jpg?_nc_cat=0&oh=d9bbaeeaf49c3ae45d8172e3814afb69&oe=5B91C8BA"
    }
    else if (currentImage.src == "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22181651_1531234033636352_8512348432796818873_o.jpg?_nc_cat=0&oh=d9bbaeeaf49c3ae45d8172e3814afb69&oe=5B91C8BA") {
        currentImage.src = "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22219938_1531234160303006_3416806563904470704_o.jpg?_nc_cat=0&oh=a517d05f1336453383022f00de0246b5&oe=5B58D261"
    }
    else if (currentImage.src == "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22219938_1531234160303006_3416806563904470704_o.jpg?_nc_cat=0&oh=a517d05f1336453383022f00de0246b5&oe=5B58D261") {
        currentImage.src = "https://scontent-sea1-1.xx.fbcdn.net/v/t31.0-8/22137100_1531234166969672_8345964285248008713_o.jpg?_nc_cat=0&oh=d29774bad57f32295b56a8491bdb59a0&oe=5B9002EB"
    }
    else {
        currentImage.src = "https://scontent-sea1-1.xx.fbcdn.net/v/t1.0-9/22196364_1531234120303010_5342914097511881599_n.jpg?_nc_cat=0&oh=6294f300d8cbce483acf9510b3fc4cf9&oe=5B5649E6"
    }
}