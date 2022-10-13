#include <stdio.h>
int main(void){
    int num[100],n,i,l1,l2;
    printf("Enter the size of array: ");
    scanf("%d",&n);
    printf("Enter the array elements: ");
    for(i=0;i<n;i++)
    {
        scanf("%d",&num[i]);
    }
    l1=0;
    for(i=0;i<n;i++)
    {
        if(num[i]>l1)
        {
            l2=l1;
            l1=num[i];
        }else if(l2<num[i] && l1>l2)
        {
            l2=num[i];
        }
    }
    printf("The second largest element is: %d",l2);
}