<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Convert Currency</h5>
                        <form action="" method="">
                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount in Dollar">
                            <br>
                            <p>Jordan Dinar: <span id="jdo"></span> </p>
                            <p>Euro: <span id="eur"></span> </p>
                            <p>Shikel: <span id="ils"></span> </p>
                            <p>Egyptian pound: <span id="egp"></span> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="content">
        {{-- @foreach ($posts as $post)
        <div>
            <h2>{{ $post['title'] }}</h2>
            <p>{{ $post['body'] }}</p>
            <hr>
        </div>
        @endforeach --}}

        {{-- <div>
            <h2>ffff</h2>
            <p>eee</p>
            <hr>
        </div> --}}

    </div>



    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>

        let url = "https://api.apilayer.com/fixer/latest?base=USD&symbols=JOD,EUR,ILS,EGP&apikey=PESO8AvwhFhr1L3s2EKVsIKCRFMljYZv";

        let amount = document.querySelector('#amount');

        amount.onkeyup = () => {
            console.log(amount.value);

            axios.get(url)
            .then(res => {
                document.querySelector('#jdo').innerHTML = (amount.value * res.data.rates.JOD).toFixed(2)
                document.querySelector('#eur').innerHTML = (amount.value * res.data.rates.EUR).toFixed(2)
                document.querySelector('#ils').innerHTML = (amount.value * res.data.rates.ILS).toFixed(2)
                document.querySelector('#egp').innerHTML = (amount.value * res.data.rates.EGP).toFixed(2)
            })

        }



        let content = document.getElementById('content');

        // axios.get('https://jsonplaceholder.typicode.com/posts')
        axios.get('/api/products')
        .then(res => {
            res.data.forEach(el => {
                let item = `<div>
                    <h2>${el.name_en}</h2>
                    <p>${el.content_en}</p>
                    <hr>
                </div>`;
                content.innerHTML += item;
            });
        })
    </script>
</body>
</html>
