package com.example.com.codeforindia.zariyahacker;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.support.v7.app.ActionBar;
import android.support.v7.app.ActionBarActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;

public class MainActivity extends ActionBarActivity {

    /**
     * The {@link android.support.v4.view.PagerAdapter} that will provide
     * fragments for each of the sections. We use a
     * {@link FragmentPagerAdapter} derivative, which will keep every
     * loaded fragment in memory. If this becomes too memory intensive, it
     * may be best to switch to a
     * {@link android.support.v4.app.FragmentStatePagerAdapter}.
     */
    //SectionsPagerAdapter mSectionsPagerAdapter;

    /**
     * The {@link ViewPager} that will host the section contents.
     */
    //ViewPager mViewPager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Set up the action bar.
        final ActionBar actionBar = getSupportActionBar();
        actionBar.setNavigationMode(ActionBar.NAVIGATION_MODE_TABS);

             
     // create new tabs and set up the titles of the tabs
        ActionBar.Tab mReportTab = actionBar.newTab().setText(
                                getString(R.string.title_section1));
        ActionBar.Tab mViewTab = actionBar.newTab().setText(
                                getString(R.string.title_section2));
        ActionBar.Tab mTrackTab = actionBar.newTab().setText(
                                getString(R.string.title_section3));
        ActionBar.Tab mConnectTab = actionBar.newTab().setText(
                                getString(R.string.title_section4));
        
     // create the fragments
        Fragment mReportFragment = new ReportFragment();
        Fragment mViewFragment = new ViewFragment();
        Fragment mTrackFragment = new TrackFragment();
        Fragment mConnectFragment = new ConnectFragment();

        // bind the fragments to the tabs - set up tabListeners for each tab
        mReportTab.setTabListener(new MyTabsListener(mReportFragment,
                                getApplicationContext()));
        mViewTab.setTabListener(new MyTabsListener(mViewFragment,
                                getApplicationContext()));
        mTrackTab.setTabListener(new MyTabsListener(mTrackFragment,
                                getApplicationContext()));
        mConnectTab.setTabListener(new MyTabsListener(mConnectFragment,
                                getApplicationContext()));

        // add the tabs to the action bar
        actionBar.addTab(mReportTab);
        actionBar.addTab(mViewTab);
        actionBar.addTab(mTrackTab);
        actionBar.addTab(mConnectTab);
        
        if(savedInstanceState!=null)
        	actionBar.setSelectedNavigationItem(savedInstanceState.getInt("tab_key", 0));
        
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        
        // Inflate the menu; this adds items to the action bar if it is present.
    	 MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        return super.onOptionsItemSelected(item);
    }

}
