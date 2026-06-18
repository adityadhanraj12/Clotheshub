@extends('layout.app')
@section('section')
  <x-page-header title="Contact" />
  <main class="contact-page">
    <!-- Contact page-->
    <section class="contact">
      <div class="container">
        <header>
          <p class="lead">
            Have a question about our products, orders, shipping, or returns? We're here to help! At ClothesHub, customer
            satisfaction is our top priority. Whether you need assistance with sizing, tracking an order, payment issues,
            or general inquiries, our support team is ready to assist you. Feel free to contact us through the form below,
            and we'll get back to you as soon as possible.
          </p>
        </header>
        <div class="row">
          <div class="col-md-4">
            <div class="contact-icon">
              <div class="icon icon-street-map"></div>
            </div>
            <h3>Address</h3>
            <p>ClothesHub Fashion Store<br>
              Sector 34-A<br>
              Chandigarh, Punjab 160022<br>
              <strong>India</strong>
            </p>
          </div>
          <div class="col-md-4">
            <div class="contact-icon">
              <div class="icon icon-support"></div>
            </div>
            <h3>Call Center</h3>
            <p>
              Have questions about our products or your order?
              Contact our support team for quick assistance and updates.
            </p>
            <p><strong>+91 08765 43210</strong></p>
          </div>
          <div class="col-md-4">
            <div class="contact-icon">
              <div class="icon icon-envelope"></div>
            </div>
            <h3>Electronic support</h3>
            <p>Please feel free to write an email to us or to use our electronic ticketing system.</p>
            <ul class="list-style-none">
              <li><strong><a href="mailto:">support@clotheshub.com</a></strong></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <header class="mb-5">
          <h2 class="heading-line">Contact form</h2>
        </header>
        <div class="row">
          <div class="col-md-7">
            <form id="contact-form" method="post" action="contact.php" class="custom-form form">
              <div class="controls">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name" class="form-label">Your first name *</label>
                      <input type="text" name="name" id="name" placeholder="Enter your firstname" required="required"
                        class="form-control">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="surname" class="form-label">Your last name *</label>
                      <input type="text" name="surname" id="surname" placeholder="Enter your  lastname"
                        required="required" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Your email *</label>
                  <input type="email" name="email" id="email" placeholder="Enter your  email" required="required"
                    class="form-control">
                </div>
                <div class="form-group">
                  <label for="message" class="form-label">Your message for us *</label>
                  <textarea rows="4" name="message" id="message" placeholder="Enter your message" required="required"
                    class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-template">Send message</button>
              </div>
            </form>
          </div>
          <div class="col-md-5">
            <p>
              At ClothesHub, we are passionate about bringing you the latest fashion trends at affordable prices. Our
              carefully curated collection includes stylish clothing, footwear, and accessories designed to help you
              express your unique personality and confidence.
            </p>

            <p>
              We value our customers and strive to provide a seamless shopping experience, from browsing and ordering to
              delivery and support. If you have any questions, feedback, or concerns, feel free to reach out to us through
              the contact form. Our team is always ready to help.
            </p>

            <div class="social">
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection