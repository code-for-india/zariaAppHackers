package com.example.com.codeforindia.zariyahacker;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

import android.util.Log;

import com.google.gson.Gson;



public class HttpCalls
{

	
	public static final int RESPONSE_SUCCESS = 200;
	
	public static final String viewReportURL = "http://54.186.110.31/viewReport";

	/**
	 * Url parameter
	 * 
	 */
	public static class Result
	{
		public int code;
		public String text;
	}

	
  public static AvailableReprt[] viewReportRequest()
  {
	 
	  try {
		  HttpCalls.Result response = HttpCalls.makeGetRequest( new URL(viewReportURL));
			Gson gs = new Gson();
			
			AvailableReprt[] result = gs.fromJson(response.text, AvailableReprt[] .class);
			Log.d("viewReportRequest",String.valueOf(result));

			if (result != null)
			{
				 for(final AvailableReprt report: result){
					Log.d("HttpCalls",String.valueOf(report.latitude));
				}
				return result;
			}
	} catch (MalformedURLException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
	  return null;
  }
	
	


	public static Result makeGetRequest( final URL url)
	{

		final Result result = new Result();
		
				InputStream inputStream = null;
				try
				{
					HttpURLConnection connection = (HttpURLConnection) url.openConnection();

					connection.setRequestMethod("GET");

					
					
					connection.setConnectTimeout(5000); // 5 sec
					connection.setReadTimeout(10000); // 10 sec
					connection.setDoInput(true);

					long time = System.currentTimeMillis();
					connection.connect();


					result.code = connection.getResponseCode();

					
					if (result.code == RESPONSE_SUCCESS )
					{
						inputStream = connection.getInputStream();
						BufferedReader br = new BufferedReader(new InputStreamReader(inputStream));
						String temp;
						StringBuilder response = new StringBuilder();

						while ((temp = br.readLine()) != null)
						{
							response.append(temp);
						}
						result.text = response.toString();
						Log.d("HTTPCALLS", result.text);
					} else
					{
						Log.d("HTTPCALLS","error");

						throw new Exception("Failure Response Code : " + result.code);
					}

					
					time = System.currentTimeMillis() - time;

				} catch (Exception e)
				{
					 e.printStackTrace();
				} finally
				{
					if (inputStream != null)
					{
						try
						{
							inputStream.close();
						} catch (Exception ex)
						{
							// ignore
						}
					}
				}
				return result;
			
		
	}


	
	public static boolean isNullOrEmpty(String str)
	{
		return str == null ? true : str.equals("");
	}
	

}
