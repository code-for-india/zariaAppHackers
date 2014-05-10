package com.example.com.codeforindia.zariyahacker;

import android.content.Context;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.ActionBar.Tab;
import android.support.v7.app.ActionBar;
import android.widget.Toast;

public class MyTabsListener implements ActionBar.TabListener {
    public Fragment fragment;
    public Context context;

    public MyTabsListener(Fragment fragment, Context context) {
                this.fragment = fragment;
                this.context = context;

    }

    @Override
    public void onTabReselected(Tab tab, FragmentTransaction ft) {
                Toast.makeText(context, "Reselected!", Toast.LENGTH_SHORT).show();

    }

    @Override
    public void onTabSelected(Tab tab, FragmentTransaction ft) {
                Toast.makeText(context, "Selected!", Toast.LENGTH_SHORT).show();
                ft.replace(R.id.fragment_container, fragment);
    }

    @Override
    public void onTabUnselected(Tab tab, FragmentTransaction ft) {
                Toast.makeText(context, "Unselected!", Toast.LENGTH_SHORT).show();
                ft.remove(fragment);
    }

}
