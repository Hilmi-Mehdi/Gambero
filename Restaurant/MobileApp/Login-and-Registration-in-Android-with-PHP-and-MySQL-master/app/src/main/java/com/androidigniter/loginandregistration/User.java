package com.androidigniter.loginandregistration;

import java.util.Date;

/**
 * Created by AndroidIgniter on 23 Mar 2019 020.
 */

public class User {
    String username;
    String fullName;
    String role;
    Date sessionExpiryDate;

    public void setUsername(String username) {
        this.username = username;
    }

    public void setFullName(String fullName) {
        this.fullName = fullName;
    }

    public void setRole(String role) {
        this.role = role;
    }

    public void setSessionExpiryDate(Date sessionExpiryDate) {
        this.sessionExpiryDate = sessionExpiryDate;
    }

    public String getUsername() {
        return username;
    }

    public String getFullName() {
        return fullName;
    }

    public String getRole() {
        return role;
    }

    public Date getSessionExpiryDate() {
        return sessionExpiryDate;
    }
}
