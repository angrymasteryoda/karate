<form class="input signUpForm" >
    <p id="errors">

    </p>
    <label>Name:
        <input name="name" type="text" placeholder="Name" value="<?php echo $data['name']?>" data-type="name"/>
    </label>
    <label>Email:
        <input name="email" type="text" placeholder="Email" value="<?php echo $data['email']?>" data-type="email"/>
    </label>
    <label class="floatleft phoneInput">Phone Number:
        <input class="" name="phone" type="text" placeholder="Phone Number" value="<?php echo $data['phone']?>" data-type="usphone" />

    </label>
    <label class="floatleft extensionInput">Extension:
        <input class="" name="extension" type="text" placeholder="Extension" value="<?php echo $data['extension']?>" data-type="extension" />
    </label>
    <div class="clear"></div>
    <label>Age:
        <input name="age" type="text" placeholder="Age" value="<?php echo $data['age']?>" data-type="numbers"/>
    </label>
    <label>Who are the lessons for<br/>
        Child: <input name="whoFor" type="radio" value="Child" data-type="whoFor" data-pass="true" />
        Self:<input name="whoFor" type="radio" value="Self" data-type="whoFor" data-pass="false" /><br/>
    </label>
    <div class="none whoFor margin10_top">
        <label>Parent Name
            <input type="text" placeholder="Parent Name" name="pName" value="<?php echo $data['parent_name']?>" data-type="pName" data-parent="whoFor"/>
        </label>
        <label>Parent Cell Phone
            <input type="text" placeholder="Parent Cell Phone" name="pCell" value="<?php echo $data['parent_cell']?>" data-type="pCell" data-parent="whoFor"/>
        </label>
    </div>
    <label>Past Experience<br/>
        Yes: <input name="experience" type="radio" value="Yes" data-type="experience" data-pass="true" />
        No:<input name="experience" type="radio" value="No" data-type="experience" data-pass="false" /><br/>
    </label>
    <div class="none experience margin10_top">
        <label>Current Belt
            <input type="text" placeholder="Current Belt" name="belt" value="<?php echo $data['belts']?>" data-type="belt" data-parent="experience"/>
        </label>
    </div>
    <label>Other Comments:
        <textarea placeholder="Comments" name="comments" >eval(echo $data['comments'])</textarea>
    </label>
    <input class="submit" type="submit" value="Send" />
</form>