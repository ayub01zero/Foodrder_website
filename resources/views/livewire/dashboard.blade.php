<div>
   


   
    <section id="contact ">
        <div class="container">
         
        

 <div class="row mb-5">
 <div class="col-md-8 mx-auto text-center">
   <h6 class="text-success">CONTACT US</h6>
   <h1>Get In Touch</h1>
   <p>We value your feedback and welcome any 
     questions or concerns you may have. Please do not hesitate to
      contact us via phone, email, or social media with any inquiries. Our team is available to assist you and address any issues 
     promptly. We look forward to hearing from you and appreciate your continued support</p>
 </div>
 </div>
 <div class="col-md-4 mx-auto text-center">
@if(session()->has('status'))
    <div class="alert alert-success" style="background-color: #d4edda; border-color: #c3e6cb; color: #155724; padding: 10px; border-radius: 5px;">
        <strong>{{ session('status') }}</strong>
    </div>
@endif

</div>
 <form wire:submit.prevent="savePost" class="row g-3 justify-content-center">
 <div class="col-md-5">
   <input type="text" wire:model.prefer="full_name" class="form-control" placeholder="Full Name "  required>
 </div>
 <div class="col-md-5">
   <input type="text" wire:model.prefer="email" class="form-control" placeholder="Enter E-mail" required>
 </div>
 <div class="col-md-10">
   <input type="text" wire:model.prefer="subject" class="form-control" placeholder="Enter Subject" required>
 </div>
 <div class="col-md-10">
   <textarea cols="30" rows="5" class="form-control" wire:model.prefer="message" required
       placeholder="Enter Message"></textarea>
 </div>
 <div class="col-md-10 d-grid">
   <button type="submit"  class="btn btn-success">Send Information</button>
 </div>
 </form>
 </div>
</section>





</div>
