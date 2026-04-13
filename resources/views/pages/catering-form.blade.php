<div class="container" >

    <div class="row justify-content-center" >
        <div class="col-md-10">
            <div class="contact-section bg-primary card-body text-light">
                <h2 class="h1 text-center">Get In Touch</h2>
               
                <div class="text-left mb-4">
                    <h2 class="h5 get-in-title">{!! applicationSettings('catering-contact-text') !!}</h2>
                </div>

                <form action="{{ url('catering-form-submission') }}" method="POST" id="contact-form">
                    @csrf
                    
                    <div class="row">
                     
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Name*" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number*"
                                data-parsley-type="digits" data-parsley-length="[10, 10]" required>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" name="email" data-parsely-type="email"
                                placeholder="Email Address*" required>
                        </div>
                      
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" minlength="10" rows="5" placeholder="Write Your Catering  Need*" required></textarea>
                    </div>
                    <br />
                    <button class="btn btn-secondary" type="submit" id="contact_btn">SUBMIT</button>
                </form>

            </div>
        </div>
    </div>
</div>