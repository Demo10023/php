import java.util.*;
import java.io.*;

public class SetC1
{
	static Scanner in = new Scanner(System.in);

	public static void insertLine(LinkedList<String> line)
	{
		System.out.print("Enter Line : ");
		int num = in.nextInt();
		System.out.print("Enter Content to Insert : ");
		String data = in.next();
		line.add(num,data);		
		System.out.println("Line : "+line);
	}

	public static void deleteLine(LinkedList<String> line)
	{
		System.out.print("Enter Line to Delete : ");
		int num = in.nextInt();

		line.remove(num);
	}

	public static void appendLine(LinkedList<String> line)
	{
		System.out.print("Enter Content to Append : ");
		String data = in.next();
		line.add(data);
	}

	public static void modifyLine(LinkedList<String> line)
	{
		System.out.print("Enter number of line to modify : ");
		int num = in.nextInt();
		System.out.println("Line no "+num+" : "+line.get(num));
		System.out.print("Enter Content to Modify : ");
		String data = in.next();
		line.set(num,data);
	}

	public static void exit(LinkedList<String> line,String fname) throws IOException
	{
		File f = new File(fname);
		FileWriter fw = new FileWriter(f);
		BufferedWriter bw = new BufferedWriter(fw);

		Iterator ir = line.iterator();

		while(ir.hasNext())
		{
			bw.write((String)ir.next()+"\n");
		}

		bw.close();
		fw.close();

	}


	public static void main(String []args) throws IOException
	{
		if(args.length!=1)
		{
			System.out.println("You Did not Provided File !");
			System.exit(0);
		}

		Scanner in = new Scanner(System.in);

		String fname = args[0];

		LinkedList<String> line = new LinkedList<>();

		File f = new File(fname);
		FileReader fr = new FileReader(f);
		BufferedReader br = new BufferedReader(fr);

		while(true)
		{
			String data = br.readLine();

			if(data==null)
			{
				break;
			}

			line.add(data);
		}

		while(true)
		{
			System.out.println("1. Insert Line");
			System.out.println("2. Delete Line");
			System.out.println("3. Append Line");
			System.out.println("4. Modify Line");
			System.out.println("5. Exit\n");

			System.out.print("Enter Choice : ");
			int ch = in.nextInt();

			switch(ch)
			{
			case 1:
				SetC1.insertLine(line);
				break;

			case 2:
				SetC1.deleteLine(line);
				break;

			case 3:
				SetC1.appendLine(line);
				break;

			case 4:
				SetC1.modifyLine(line);
				break;

			case 5:
				SetC1.exit(line,fname);
				System.out.println("Exited !");
				System.exit(0);
				break;

			default:
				System.out.println("Invalid Choice !");
			}
		}


	}
}