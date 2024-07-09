@extends('layouts.app')
<head>
  <link href="{{asset('assets/css/appointment.css')}}" rel="stylesheet">

</head>
@section('content')

<section id="contact" class="contact section-bg">
  <div class="container" data-aos="fade-up">

<div class="col-lg-12 mt-4 mt-lg-0 custom-force-center">

  <div class="div">
    <div class="row">
      <div class="col">

        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('assets/img/services-1.jpg') }}" class="d-block w-100 caroImg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/img/services-2.jpg') }}" class="d-block w-100 caroImg" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/img/services-3.jpg') }}" class="d-block w-100 caroImg" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form w-100" data-aos="fade-up">
          <div class="form-group mb-3">

<!-- Button trigger modal -->
<div class="additionalbutton">
<a type="button " class="btn default" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Additional Services
</a>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="hello">Additional Service Category</div>
        <table>
          <thead>
            <tr>
              <th style="width: 50px;"></th>
              <th style="width: 350px;"></th>
              <th></th>
            </tr>
          </thead>
          <tbody class="modalfont">

            <tr>
              <td>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>

              </td>
              <td>Additional Service 1</td>
              <td>$50.00</td>
            </tr>

            <tr>
              <td>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>

              </td>
              <td>Additional Service 2</td>
              <td>$50.00</td>
            </tr>

            <tr>
              <td>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>

              </td>
              <td>Additional Service 3</td>
              <td>$50.00</td>
            </tr>
          </tbody>
        </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>

          </div>
          <div class="row">
            <div class="col-md-6 form-group labs">
              <label for="time">Time of Appointment</label>
              <input type="time" name="time" class="form-control" id="time" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0 labs">
              <label for="name">Date of Appointment</label>
              <input type="date" class="form-control" name="date" id="date" placeholder="Shop Name" required>
            </div>
          </div>
          <div class="form-group mt-3 labs">
            <label for="message">Additional Note/Message</label>
            <textarea class="form-control" name="message" rows="5" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="price">Total: $0.00</div>
          <div class="text-center"><button type="custom-submit">Make an Appointment</button></div>
        </form>

      </div>
    </div>




  </div>

</div>

  </div>
</section>


@endsection

