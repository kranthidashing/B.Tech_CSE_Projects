#include<stdio.h>
#include<stdlib.h>
#include<math.h>
struct h_code
{
	int data;
	int code;
	struct h_code* next;
}*h_codes;
struct root
{
	int data;
	int ans;
	int flag;
	struct root* left;
	struct root* right;
}*tree;
struct node
{
	int data;
	struct node* next;
	struct root* down;
}*head=NULL;
long long int ans[100000];
int size=0;
void myfunc(struct node *head);
//struct root *encoding(struct root* tree);
void sortedInsert(struct node** head_ref, struct node* new_node)
{
	struct node* current;
	if (*head_ref == NULL || (*head_ref)->data >= new_node->data)
	{
		new_node->next = *head_ref;
		*head_ref = new_node;
	}
	else
	{
		current = *head_ref;
		while (current->next!=NULL &&
				current->next->data < new_node->data)
		{
			current = current->next;
		}
		new_node->next = current->next;
		current->next = new_node;
	}
}
struct node *newNode(int new_data)
{
	struct node* new_node =malloc(sizeof(struct node));
	new_node->data  = new_data;
	struct root* temp=malloc(sizeof(struct root));
	temp->data=new_data;
	temp->left=NULL;
	temp->right=NULL;
	new_node->next =  NULL;
	new_node->down=temp;

	return new_node;
}
void printList(struct node *head)
{
	struct node *temp = head;
	while(temp->next != NULL)
	{
		printf("%d  ", temp->data);
		temp = temp->next;
	}
}
void print_codes(struct h_code* h_codes)
{
	struct h_code *temp = h_codes;
	while(temp->next != NULL)
	{
		printf("%d  ", temp->data);
		printf("%d -> ", temp->code);
		temp = temp->next;
	}
}
void preorder(struct root *temp);
int i=0;
struct root* init(struct root* tree)
{
	if(tree!=NULL)
	{
		tree->flag=0;
		init(tree->left);
		init(tree->right);
	}
}
void preorder(struct root *temp)
{
	if(temp != NULL)
	{
		printf("%d ",temp->data);
		preorder(temp->left);
		preorder(temp->right);
	}
}
int isLeaf(struct root* tree)
{
	return !(tree->left) && !(tree->right) ;
}
struct h_code* insert_code(int a,int b)
{
	struct h_code* q;
	struct h_code* temp=malloc(sizeof(struct h_code));
	temp->data=a;
	temp->code=b;
	temp->next=NULL;
	if(h_codes==NULL)
	{
		h_codes=temp;
	}
	else
	{
		q=h_codes;
		while(q->next!=NULL)
		{
			q=q->next;
		}
		q->next=temp;
	}
	//return h_codes;
}
void encoding(struct root* tree, int arr[], int top)
{
	if (tree->left)
	{
		arr[top] = 0;
		encoding(tree->left, arr, top + 1);
	}
	if (tree->right)
	{
		arr[top] = 1;
		encoding(tree->right, arr, top + 1);
	}
	if (isLeaf(tree))
	{
		int a,b;
		a=tree->data;
//		printf("\n");
//		printf("%d:",a);
		int p;
		int j;
		int sum=0;
		for(j=0;j<top;j++)
		{
//			printf("%d",arr[j]);
			sum=sum+(arr[j]*(pow(10,(top-j-1))));
		}
//		printf("\n");
		b=sum;
//		printf("%d-%d\n",a,b);
		insert_code(a,b);
	}
}
int search(struct h_code* h_codes,int data)
{
	struct h_code* ptr=h_codes;
	while(ptr!=NULL)
	{
		if(ptr->data==data)
		{
			int value=ptr->code;
			return value;
		}
		ptr=ptr->next;

	}
}
int main(int argv,char **argc)
{
	int in;
	FILE *input,*output;
	input=fopen(argc[1],"r");
	if(input==NULL)
	{
		printf("\"Inputfile.txt\" file doesnot exists\n");
	}
	else
	{
		int total_size=0;
		struct node *new_node;
		while(1)
		{
			fscanf(input,"%d",&in);
			char ch=fgetc(input);
			if(ch==EOF)
			{
				break;
			}
			total_size++;
			new_node=newNode(in);
			sortedInsert(&head, new_node);
		}
//		printList(head);
		//printf("\n");
		myfunc(head);
		preorder(tree);
		printf("\n");
		//while(total_size--)
		int arr[100], top = 0;
		encoding(tree, arr, top);
		//		encoding(tree);
		FILE *output;
		FILE *input2;
		input2=fopen(argc[1],"r");
		output=fopen(argc[2],"w");
		while(1)
		{
			fscanf(input2,"%d",&in);
			char ch1=fgetc(input2);
			if(ch1==EOF)
			{
				break;
			}
			int final=search(h_codes,in);
			//	int index;
			//	for(index=0;index<size;index)
			//	{
			fprintf(output,"%d ", final);	
			//	printf("%d ",final);
		}
		//print_codes(h_codes);
		//printf("\n");
		//		while(tree!=NULL)
		//		{	
		//			tree=tree->next;
		//		}
		/*encoding of huffman tree*/
		//printList(head);
		printf("Completed Successfully\n");
		}
	return 0;
}
void myfunc(struct node *head)
{
	struct node* temp1=head;
	struct node* temp2=head->next;

	struct node* min1 =malloc(sizeof(struct node));
	min1->data  = (temp1->data)+(temp2->data);
	struct root* tempi=malloc(sizeof(struct root));
	tempi->data=(temp1->data)+(temp2->data);
	tempi->left=temp1->down;
	tempi->right=temp2->down;
	min1->next =  NULL;
	min1->down=tempi;

	struct node *del;
	del = head;
	head = head->next;
	free(del);
	struct node *dell;
	dell = head;
	head = head->next;
	free(dell);
	if(head!=NULL)
	{
		sortedInsert(&head, min1);
		//printList(head);
		//		printf("\n");
		myfunc(head);
		//printList(head);
		//		printf("\n");
	}
	else
	{
		//		printf("%d-",min1->data);
		//		printf("%d\n",min1->down->data);
		i=0;
		//while(size--)
		//{
		//encoding(min1->down);
		tree=min1->down;
		//	}
		/*now store head->ans from starting node to last in a file*/
		return;
	}
}
//int a[10000],n=0;
/*
   void *store()
   {
   int j;
   long long int sum=0;
   for(j=0;j<n;j++)
   {
   sum=sum+(a[j]*(pow(10,(j))));
   }
   ans[size]=sum;
   size++;
   tree->ans=sum;
   }
 *//*
struct root *encoding(struct root* tree)
{
	if(tree==NULL)
	{
		return;
	}
	if(tree->left==NULL&&tree->right==NULL)
	{
		//	printf("%d 1\n",n);
		int j;
		long long int sum=0;
		for(j=0;j<n;j++)
		{
			//	printf("%d ",a[j]);
			sum=sum+(a[j]*(pow(10,(j))));
		}
		printf("%lld\n",sum);
		ans[size]=sum;
		size++;
		tree->ans=sum;
		/*		struct root* temp=tree;
				printf("check");
				temp=NULL;
				tree=temp;
				free(temp);
				printf("check");
		//	tree=NULL;
		 */
		//store();
	/*	tree->flag=1;
		n=0;
		return;
	}
	else
	{
		if(tree->right->flag==0)
		{
			if(tree->right==NULL)
			{
				a[n]=0;
				n++;
				//printf("%d 2\n",n);
				encoding(tree->left);
				//	tree->left=NULL;
			}
			else
			{
				if(tree->flag==0)
				{
					a[n]=1;
					n++;
					//printf("%d 3\n",n);
					encoding(tree->right);
					//		tree->right=NULL;
				}
			}
		}
		else
		{
		//	encoding(tree);
			return;
		}
	}
}*/
