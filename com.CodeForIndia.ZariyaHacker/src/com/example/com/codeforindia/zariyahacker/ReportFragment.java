package com.example.com.codeforindia.zariyahacker;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.net.URL;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Locale;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicHeader;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.HttpConnectionParams;
import org.apache.http.params.HttpParams;
import org.apache.http.protocol.HTTP;
import org.json.JSONException;
import org.json.JSONObject;

import android.location.Address;
import android.location.Geocoder;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.RadioButton;
import android.widget.Toast;

public class ReportFragment extends Fragment {

	@Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
        Bundle savedInstanceState) {
		
		// Inflate the layout for this fragment
        final View view = inflater.inflate(R.layout.report_fragment_main, container, false);
        
        final JSONObject reportData = new JSONObject();
        final List<RadioButton> reportingRadiButtons = new ArrayList<RadioButton>();
        RadioButton rb = (RadioButton) view.findViewById(R.id.radioButton1);
    	reportingRadiButtons.add(rb);
    	rb = (RadioButton) view.findViewById(R.id.radioButton2);
    	reportingRadiButtons.add(rb);
    	rb = (RadioButton) view.findViewById(R.id.radioButton3);
    	reportingRadiButtons.add(rb);
    	rb = (RadioButton) view.findViewById(R.id.radioButton4);
    	reportingRadiButtons.add(rb);
        
    	final List<RadioButton> assailantRadiButtons = new ArrayList<RadioButton>();
        RadioButton arb = (RadioButton) view.findViewById(R.id.radioButton5);
        assailantRadiButtons.add(arb);
    	arb = (RadioButton) view.findViewById(R.id.radioButton6);
    	assailantRadiButtons.add(arb);
    	
		Button incbutton = (Button) view.findViewById(R.id.next_incident);
        incbutton.setOnClickListener(new OnClickListener()
	    {
        	
        	LinearLayout perlay = (LinearLayout) view.findViewById(R.id.person_layout);
        	LinearLayout inclay = (LinearLayout) view.findViewById(R.id.incident_layout);
			
        	
			@Override
			public void onClick(View v) {
				
				for(RadioButton rb: reportingRadiButtons){
					if(rb.isChecked()){
						try {
							reportData.put("person", rb.getText());
						} catch (JSONException e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						}
						
						break;
					}
				}
				
				for(RadioButton rb: assailantRadiButtons){
					if(rb.isChecked()){
						
						try {
							reportData.put("doYouKnow", ((String) rb.getText()).substring(0,1));
							reportData.put("firstTimeCrime", "Not Applicable");
						} catch (JSONException e) {
							// TODO Auto-generated catch block
							e.printStackTrace();
						}
					}
				}
				perlay.setVisibility(View.INVISIBLE);
				inclay.setVisibility(View.VISIBLE);
			}
	    	
	    });
        
        
	    
	    Button perbutton = (Button) view.findViewById(R.id.previous_person);
	    perbutton.setOnClickListener(new OnClickListener()
	    {
	    	LinearLayout inclay = (LinearLayout) view.findViewById(R.id.incident_layout);
	    	LinearLayout perlay = (LinearLayout) view.findViewById(R.id.person_layout);
			
			@Override
			public void onClick(View v) {	
				
				inclay.setVisibility(View.INVISIBLE);
				perlay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    
	    final List<CheckBox> incidentListCheckBoxs = new ArrayList<CheckBox>();
	    CheckBox cb = (CheckBox) view.findViewById(R.id.checkBox1);
        incidentListCheckBoxs.add(cb);
        cb = (CheckBox) view.findViewById(R.id.checkBox2);
        incidentListCheckBoxs.add(cb);
    	cb = (CheckBox) view.findViewById(R.id.checkBox3);
    	incidentListCheckBoxs.add(cb);
    	cb = (CheckBox) view.findViewById(R.id.checkBox4);
    	incidentListCheckBoxs.add(cb);
    	cb = (CheckBox) view.findViewById(R.id.checkBox5);
        incidentListCheckBoxs.add(cb);
        cb = (CheckBox) view.findViewById(R.id.checkBox6);
        incidentListCheckBoxs.add(cb);
    	cb = (CheckBox) view.findViewById(R.id.checkBox7);
    	incidentListCheckBoxs.add(cb);
    	cb = (CheckBox) view.findViewById(R.id.checkBox8);
    	
    	final EditText et = (EditText) view.findViewById(R.id.incident_other_text);
    	
    	cb.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {

            @Override
            public void onCheckedChanged(CompoundButton buttonView,
                    boolean isChecked) {
                if(isChecked)
                	et.setVisibility(View.VISIBLE);
                else
                	et.setVisibility(View.INVISIBLE);

            }
        });
	    
    	
    	
	    Button locbutton = (Button) view.findViewById(R.id.next_location);
	    locbutton.setOnClickListener(new OnClickListener()
	    {
	    	
	    	LinearLayout perlay = (LinearLayout) view.findViewById(R.id.incident_layout);
	    	LinearLayout inclay = (LinearLayout) view.findViewById(R.id.location_layout);
			
			@Override
			public void onClick(View v) {
				
				String incidents = "";
				
				for(CheckBox cb: incidentListCheckBoxs){
					if(cb.isChecked()){
						incidents = incidents + (String) cb.getText() + ",";
					}
				}
				try {
					reportData.put("incident_list", incidents);
					
					if(et.getVisibility() == View.VISIBLE)
						reportData.put("otherIncidence", et.getText());
					
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				perlay.setVisibility(View.INVISIBLE);
				inclay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    Button preIncbutton = (Button) view.findViewById(R.id.previous_incident);
	    preIncbutton.setOnClickListener(new OnClickListener()
	    {
	    	LinearLayout perlay = (LinearLayout) view.findViewById(R.id.location_layout);
	    	LinearLayout inclay = (LinearLayout) view.findViewById(R.id.incident_layout);
			
			@Override
			public void onClick(View v) {
				
				perlay.setVisibility(View.INVISIBLE);
				inclay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    final EditText let = (EditText) view.findViewById(R.id.location_editText1);
	    final Geocoder geoCoder = new Geocoder(container.getContext(), Locale.getDefault());  
	    Button loc2button = (Button) view.findViewById(R.id.next_location2);
	    loc2button.setOnClickListener(new OnClickListener()
	    {
        	LinearLayout loclay = (LinearLayout) view.findViewById(R.id.location_layout);
        	LinearLayout loc2lay = (LinearLayout) view.findViewById(R.id.location_layout2);
			
			@Override
			public void onClick(View v) {
				try {
					reportData.put("location", let.getText());
					
					
					 List<Address> addresses = geoCoder.getFromLocationName(""+let.getText() , 1);
		                if (addresses.size() > 0) 
		                {            
		                	reportData.put("locationLat", String.valueOf(addresses.get(0).getLatitude()));
							reportData.put("locationLng", String.valueOf(addresses.get(0).getLongitude()));
		                }
					
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				loclay.setVisibility(View.INVISIBLE);
				loc2lay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    Button perlocbutton = (Button) view.findViewById(R.id.previous_location);
	    perlocbutton.setOnClickListener(new OnClickListener()
	    {
	    	LinearLayout loclay = (LinearLayout) view.findViewById(R.id.location_layout);
	    	LinearLayout loc2lay = (LinearLayout) view.findViewById(R.id.location_layout2);
			
			@Override
			public void onClick(View v) {	
				loc2lay.setVisibility(View.INVISIBLE);
				loclay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    final DatePicker datePicker = (DatePicker) view.findViewById(R.id.datePicker1);
	    Button infobutton = (Button) view.findViewById(R.id.next_information);
	    infobutton.setOnClickListener(new OnClickListener()
	    {
	    	
	    	LinearLayout infolay = (LinearLayout) view.findViewById(R.id.information_layout);
	    	LinearLayout loc2lay = (LinearLayout) view.findViewById(R.id.location_layout2);
			
			@Override
			public void onClick(View v) {
				
				try {
					reportData.put("date",
					new Date(datePicker.getYear() - 1900, datePicker.getMonth(), datePicker.getDayOfMonth()));
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				loc2lay.setVisibility(View.INVISIBLE);
				infolay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    Button preloc2button = (Button) view.findViewById(R.id.previous_location2);
	    preloc2button.setOnClickListener(new OnClickListener()
	    {
	    	
	    	LinearLayout infolay = (LinearLayout) view.findViewById(R.id.information_layout);
	    	LinearLayout loc2lay = (LinearLayout) view.findViewById(R.id.location_layout2);
			
			@Override
			public void onClick(View v) {
				infolay.setVisibility(View.INVISIBLE);
				loc2lay.setVisibility(View.VISIBLE);
			}
	    	
	    });
	    
	    
	    Button preInfobutton = (Button) view.findViewById(R.id.previous_information);
	    preInfobutton.setOnClickListener(new OnClickListener()
	    {
	    	LinearLayout sublay = (LinearLayout) view.findViewById(R.id.submit_layout);
	    	LinearLayout infoclay = (LinearLayout) view.findViewById(R.id.information_layout);
			
			@Override
			public void onClick(View v) {
				
				sublay.setVisibility(View.INVISIBLE);
				infoclay.setVisibility(View.VISIBLE);
			}
	    	
	    });
        
	    final EditText cet = (EditText) view.findViewById(R.id.info_editText1);
	    Button subbutton = (Button) view.findViewById(R.id.next_submit);
	    subbutton.setOnClickListener(new OnClickListener()
	    {
	    	LinearLayout sublay = (LinearLayout) view.findViewById(R.id.submit_layout);
	    	LinearLayout infoclay = (LinearLayout) view.findViewById(R.id.information_layout);
	    	
			@Override
			public void onClick(View v) {
				
				try {
					reportData.put("comments", cet.getText());
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				infoclay.setVisibility(View.INVISIBLE);
				sublay.setVisibility(View.VISIBLE);
				
			}
	    	
	    });
	    
	    final EditText fet = (EditText) view.findViewById(R.id.submit_editText1);
	    final EditText lset = (EditText) view.findViewById(R.id.submit_editText2);
	    final EditText eet = (EditText) view.findViewById(R.id.submit_editText3);
	    final EditText pet = (EditText) view.findViewById(R.id.submit_editText4);
	    
	    Button finalsubutton = (Button) view.findViewById(R.id.submit);
	    finalsubutton.setOnClickListener(new OnClickListener()
	    {
	    	LinearLayout sublay = (LinearLayout) view.findViewById(R.id.submit_layout);
	    	LinearLayout perlay = (LinearLayout) view.findViewById(R.id.person_layout);
			
			@Override
			public void onClick(View v) {
				
				try {
					reportData.put("firstName", fet.getText());
					reportData.put("lastName", lset.getText());
					reportData.put("email", eet.getText());
					reportData.put("number", pet.getText());
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				sublay.setVisibility(View.INVISIBLE);
				perlay.setVisibility(View.VISIBLE);
				
				final String id = "";
				Runnable r = new Runnable() {
					public void run() {
						postReport(reportData, id);
					}
				};
				
				Thread t1 = new Thread(r);
				t1.start();
				try {
					t1.join();
					Toast.makeText(v.getContext(), "Report Submitted !! " + id, Toast.LENGTH_LONG).show();
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				
			}
	    	
	    });
	    
        return view;
    }
	
	
	
	private void postReport(JSONObject reportData, String id) {
		int TIMEOUT_MILLISEC = 10000;  // = 10 seconds
		HttpParams httpParams = new BasicHttpParams();
		HttpConnectionParams.setConnectionTimeout(httpParams, TIMEOUT_MILLISEC);
		HttpConnectionParams.setSoTimeout(httpParams, TIMEOUT_MILLISEC);
		HttpClient client = new DefaultHttpClient(httpParams);

		HttpPost post = new HttpPost("http://54.186.110.31/submitReport");
		StringEntity entity;
		try {
			entity = new StringEntity(reportData.toString());
			entity.setContentType(new BasicHeader(HTTP.CONTENT_TYPE, "application/json"));
	        post.setEntity(entity);
			HttpResponse response = client.execute(post);
			if(response.getStatusLine()!=null && response.getStatusLine().getStatusCode()==200){
				ByteArrayOutputStream out = new ByteArrayOutputStream();
		        response.getEntity().writeTo(out);
		        out.close();
		        id = out.toString();
			}
			Log.e("report fragment ", ""+response.getStatusLine());
		} catch (UnsupportedEncodingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (ClientProtocolException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}

	
}
