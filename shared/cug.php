    <form autocomplete="on" id="cug">
        <div class="form-wrapper">
            <div class="icons">
                <label>Full Name</label>
            </div>
            <input placeholder="Full Name" name="name" type="text" class="form-input" id="name" autocomplete="off" required onfocus="focusText(this)" onkeydown="changeTextToUpperCase(this)" />
            <span class="error-text name"></span>
        </div>
        <div class="form-wrapper">
            <div class="icons">
                <label>Contact Number</label>
            </div>
            <input placeholder="Contact Number" name="Contact Number" type="text" class="form-input" id="contact_number" autocomplete="off" required onfocus="focusText(this)" onkeydown="changeTextToUpperCase(this)" />
            <span class="error-text contact_number"></span>
        </div>
        <div class="form-wrapper">
            <div class="icons">
                <label>Do You Have Multiple Airtel Lines</label>
            </div>
            <select name="Multiple Lines" id="multi_line">
                <option>Select option</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <span class="error-text multiple_new_line"></span>
        </div>
        <div class="form-wrapper multi_view">
            <div class="icons">
                <label>Multiple Airtel Lines Of Airtel</label>
            </div>
            <textarea placeholder="Multiple Lines Of Airtel" type="tel" class="form-input" id="multi_line_number" autocomplete="off" required onfocus="focusText(this)" onkeydown="checkTextInput(this)"></textarea>
            <span class="multi_line_info"></span>
            <span class="error-text multi_line_number"></span>
        </div>
        <div class="form-wrapper">
            <div class="icons">
                <label>Need A New Airtel Line</label>
            </div>
            <select name="New Line" id="new_line">
                <option>Select option</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <span class="error-text new_line"></span>
        </div>
        <div class="form-wrapper no_new_line">
            <div class="icons">
                <label>Airtel Number</label>
            </div>
            <input placeholder="Airtel Number" name="airtel_number" type="tel" class="form-input" id="airtel_number" autocomplete="off" required onfocus="focusText(this)" onkeydown="checkNumberInput(this)" />
            <span class="error-text airtel_number"></span>
        </div>
        <div class="form-wrapper yes_new_line">
            <div class="icons">
                <label>Other Number</label>
            </div>
            <input placeholder="Other Number" name="other_number" type="tel" class="form-input" id="other_number" autocomplete="off" required onfocus="focusText(this)" onkeydown="checkNumberInput(this)" />
            <span class="error-text other_number"></span>
        </div>
        <div class="form-wrapper">
            <div class="icons">
                <label>Do You Have A SMEDAN Registration Number</label>
            </div>
            <select name="New Line" id="smedan_register">
                <option>Select option</option>
                <option>Yes</option>
                <option>No</option>
            </select>
            <span class="error-text smedan_register"></span>
            <span> <a href="https://smedanregister.ng/" class="heref" target="_blank">Click here to register your SMEDAN business</a></span>
        </div>
        <div class="form-wrapper">
            <div class="icons">
                <label>SMEDAN Number</label>
            </div>
            <input placeholder="SMEDAN Number" name="smedan_no" type="text" class="form-input" id="smedan_no" autocomplete="off" required onfocus="focusText(this)" onkeydown="checkTextInput(this)" />
            <span class="error-text smedan_no"></span>
        </div>
        <div class="member-btn">
            <button class="member_add" onclick="registerForCug(event)">Register For CUG</button>
        </div>
    </form>