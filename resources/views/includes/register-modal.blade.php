<div class="modal fade etadweer_modal" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="brandModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModalTitle">Log in</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav class="form-steps">
                    <div class="form-steps__item step-1 form-steps__item--completed">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">1</span>
                            <span class="form-steps__item-text">Question One</span>
                        </div>
                    </div>
            
                    <div class="form-steps__item step-2">
                        <div class="form-steps__item-content">
                            <span class="form-steps__item-icon">2</span>
                            <span class="form-steps__item-line"></span>
                            <span class="form-steps__item-text">Question Two</span>
                        </div>
                    </div>
            
                   
                </nav>
            
                <div class="container">
                    <form action="#" method="post" id="raq_questions">
            
                        <div class="question-title">Question 1</div>
            
                        <div class="question-container active_panel" id="question-1">
                            Q1. Question for the client? <br/>
                            A. <input type="text" value="" />
                        </div>
                        <div class="question-container" id="question-2">
                            Q2. Question for the client? <br/>
                            A. <input type="text" value="" />
                        </div>
            
                    </form>
            
                    <div class="button-bar">
                        <input type="button" value="Back" id="raq_back">
                        <input type="button" value="Next" id="raq_next">
                    </div>
            
                </div>
            
                <div id="overlay">
                    <div class="thankyou">
                        <h3>Thank You!</h3>
                        <p>Thank you, your form is submited</p>
                        <input type="button" id="start-over" value="Start Over">
                    </div>
                </div>
            
                        </div><!--modal-->
        </div>
    </div>
</div>