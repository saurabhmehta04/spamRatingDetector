package com.team.srdfileserver;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.net.*;
import java.io.*;

public class SRDFileServer implements Runnable {
    private static ServerSocket socket;
    private String[] inputs = null;
    private static Socket connection;
    private static String command       = new String();
    private static String responseStr   = new String();
   

    private static int port = 25000;
    
    SRDFileServer(Socket csocket) {
	      this.connection = csocket;
	   }

    public static void main(String args[])  {
        System.out.println("Signal Server is running.");

        try  {
            socket = new ServerSocket(port);

            while (true)  {
                connection = socket.accept();
                new Thread(new SRDFileServer(connection)).start();
                //response.close();
                System.out.println("Running");
            }
        } catch (IOException e)  {
            System.out.println("Fail!: " + e.toString());
        }

        System.out.println("Closing...");
    }

	@Override
	public void run() {
		// TODO Auto-generated method stub
			
        try {
        	System.out.println(connection.getInetAddress());
            InputStreamReader inputStream = new InputStreamReader(connection.getInputStream());
            //DataOutputStream response = new DataOutputStream(connection.getOutputStream());
            PrintWriter response = new PrintWriter(new OutputStreamWriter(connection.getOutputStream()));
            BufferedReader input = new BufferedReader(inputStream);
			command = input.readLine();
			//command="1817254";
			System.out.println("The input is " + command);
	        FileClassifier fc = new FileClassifier();
	        responseStr=fc.getResult(command)+"\n";
	        response.write(responseStr);
	        response.flush();	        
	        System.out.println(responseStr);
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
        
		
	}
}