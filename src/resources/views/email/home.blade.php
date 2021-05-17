<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>netshow.me - Backend Challenge</title>
  </head>
  <body>
  <div class="container">
    <div class="row">
      @if(session('email-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          {{ session('email-success') }}
        </div>
      @endif
      @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
  <div class="container">
    <div class="row">
      <h1 class="text-center">netshow.me challenge</h1>
      <hr>
    </div>
    <div class="row">
      <h2 class="text-center">Send us a message</h2>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('send-email') }}" class="row g-3" method="post" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Jhon Dear" required/>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">e-mail</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="jhon@contact.com" required/>
          </div>
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" pattern="\([0-9]{3}\) [0-9]{1}.[0-9]{4}-[0-9]{4}" class="form-control" id="phone" name="phone" placeholder="(083) 9.9824-2740" required/>
          </div>
          <div class="col-md-12">
            <label for="attachment" class="form-label">Attachment</label>
            <input type="file" name="attachment" id="attachment" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Your message here!" required></textarea>
          </div>
          <div class="offset-md-11 col-md-1">
            <button class="btn btn-success">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
