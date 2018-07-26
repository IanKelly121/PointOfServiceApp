package com.example.ian.applayout;

import android.support.test.espresso.Espresso;
import android.support.test.rule.ActivityTestRule;
import android.support.test.runner.AndroidJUnit4;

import org.junit.Rule;
import org.junit.Test;
import org.junit.runner.RunWith;

import static android.support.test.espresso.Espresso.onView;
import static android.support.test.espresso.Espresso.pressBack;
import static android.support.test.espresso.action.ViewActions.click;
import static android.support.test.espresso.action.ViewActions.typeText;
import static android.support.test.espresso.assertion.ViewAssertions.matches;
import static android.support.test.espresso.matcher.ViewMatchers.hasErrorText;
import static android.support.test.espresso.matcher.ViewMatchers.isDisplayed;
import static android.support.test.espresso.matcher.ViewMatchers.withId;

/**
 * Created by Finn on 12/03/2017.
 */
@RunWith(AndroidJUnit4.class)
public class LoginTest {

    @Rule
    public ActivityTestRule<LoginActivity> loginActivityTest = new ActivityTestRule<LoginActivity>(LoginActivity.class);

    @Test
    public void successfulEmployeeLogin() throws Exception{
        onView(withId(R.id.username)).perform(typeText("johndoe@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void successfulEmployerLogin() throws Exception{
        onView(withId(R.id.username)).perform(typeText("TestEmployer@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void successfulEmployeeLoginCaptialLetters() throws Exception{
        onView(withId(R.id.username)).perform(typeText("JOHNDOE@GMAIL.COM"));
        onView(withId(R.id.password)).perform(typeText("PASSWORD"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void successfulEmployerLoginCaptialLetters() throws Exception{
        onView(withId(R.id.username)).perform(typeText("TESTEMPLOYER@GMAIL.COM"));
        onView(withId(R.id.password)).perform(typeText("PASSWORD"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void noUsername() throws Exception{
        onView(withId(R.id.username)).perform(typeText(""));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.username)).check(matches(hasErrorText("Email is empty")));
    }

    @Test
    public void noPassword() throws Exception{
        onView(withId(R.id.username)).perform(typeText("johndoe@gmail.com"));
        onView(withId(R.id.password)).perform(typeText(""));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.password)).check(matches(hasErrorText("Password is empty")));
    }

    @Test
    public void wrongPassword() throws Exception{
        onView(withId(R.id.username)).perform(typeText("johndoe@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password123"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.password)).check(matches(hasErrorText("Password is empty")));
    }

    @Test
    public void wrongUsername() throws Exception{
        onView(withId(R.id.username)).perform(typeText("johndoe@gmail.commmm"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void correctButLongEmail() throws Exception{
        // 271 Characters
        onView(withId(R.id.username)).perform(typeText("reallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallyreallylongemail@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.username)).check(matches(hasErrorText("This Email is too long")));
    }

    @Test
    public void correctButLongPassword() throws Exception{
        // Can't create a password with more than 25 Characters.
        // 25 Character password
        onView(withId(R.id.username)).perform(typeText("longpassword@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("reallyreallylongpassword1"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void correctNumberEmail() throws Exception{
        // numbers in email address.
        onView(withId(R.id.username)).perform(typeText("123456789@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void correctNumberPassword() throws Exception{
        // numbers in email address.
        onView(withId(R.id.username)).perform(typeText("numberpassword@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("123456789"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void correctSpecialCharEmail() throws Exception{
        // numbers in email address.
        onView(withId(R.id.username)).perform(typeText("++--**&&@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void correctSpecialCharPassword() throws Exception{
        // numbers in email address.
        onView(withId(R.id.username)).perform(typeText("specialcharepassword@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("++--**&&"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        onView(withId(R.id.create_Order_btn)).perform(click());
    }

    @Test
    public void afterSuccessfulLoginBackPressed() throws Exception{
        //Press back button after login to see if you will be logged out.
        onView(withId(R.id.username)).perform(typeText("johndoe@gmail.com"));
        onView(withId(R.id.password)).perform(typeText("password"));
        onView(withId(R.id.username_sign_in_button)).perform(click());
        Espresso.pressBack();
        onView(withId(R.id.username)).check(matches(isDisplayed()));
    }
}