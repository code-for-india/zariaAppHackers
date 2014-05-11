package com.example.com.codeforindia.zariyahacker;

import com.google.android.gms.common.GooglePlayServicesNotAvailableException;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapView;
import com.google.android.gms.maps.MapsInitializer;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import android.app.Activity;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

public class ViewFragment extends Fragment {
	private GoogleMap googleMap;
	private MapView mMapView;
	@Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
        Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        //return inflater.inflate(R.layout.view_fragment_main, container, false);
		View v = inflater.inflate(R.layout.view_fragment_main, container, false);
        mMapView = (MapView)v.findViewById(R.id.mapView);
        mMapView.onCreate(savedInstanceState);
        mMapView.onResume();

        try {
            MapsInitializer.initialize(getActivity());
        }
        catch (GooglePlayServicesNotAvailableException e) {
            e.printStackTrace();
        }

        googleMap = mMapView.getMap();
        

        
        bindMapview();
        return v;

    }
	 public void bindMapview() {

         new MyAsyncTask(getActivity(),mMapView).execute("");
      }
	@Override
    public void onActivityCreated(Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
    }

    @Override
    public void onResume() {
        super.onResume();
        mMapView.onResume();
    }

    @Override
    public void onPause() {
        super.onPause();
        mMapView.onPause();
    }

    @Override
    public void onDestroy() {
        super.onDestroy();
        mMapView.onDestroy();
    }

    @Override
    public void onLowMemory() {
        super.onLowMemory();
        mMapView.onLowMemory();
    }
    
    class MyAsyncTask extends AsyncTask<String, String, AvailableReprt[]>
    {
        
        Activity mContex;
       public  MyAsyncTask(Activity contex,MapView mMapView)
        {
         
         this.mContex=contex;
        }

       protected AvailableReprt[] doInBackground(String... params)
        {
    	    AvailableReprt[] reprts = HttpCalls.viewReportRequest();
    	   
    	   return reprts;
           //fetch data
        }

       @Override
        protected void onPostExecute(AvailableReprt[] result) {
          {   

        	  if (result != null){
        		  for (AvailableReprt report:result){
        			  Log.d("inPostExecute",String.valueOf(report.latitude)+ " "+String.valueOf(report.longitude)+" "+report.categories);
        			  MarkerOptions marker = new MarkerOptions().position(new LatLng(report.latitude, report.longitude)).title(String.valueOf(report.latitude)+report.categories);
 	        		 
  	        		// adding markerm
        			  
  	        		googleMap.addMarker(marker);
  	        		
        		  }
        	  }
          }
       }
    }
}
