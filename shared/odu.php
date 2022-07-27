<form autocomplete="on" id="odu">
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
            <label>Address</label>
        </div>
        <textarea placeholder="Customer Address" type="text" class="form-input" id="address" autocomplete="off" required onfocus="focusText(this)" onkeydown="checkTextInput(this)"></textarea>
        <span class="error-text address"></span>
    </div>
    <div class="member-btn">
        <button class="member_add" onclick="registerForOdu(event)">Register For ODU</button>
    </div>
</form>