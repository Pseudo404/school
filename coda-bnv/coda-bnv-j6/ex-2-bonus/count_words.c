int count_words(char *str)
{
	char ch = str[0];
	int i = 0;
	int compte_mot = 0;
	while (ch != '\0')
	{
		if (ch == ' ' || ch == '\'')
		{
			while (ch == ' ' || ch ==  '\'')
			{
				i++;
				ch = str[i];
			}
			compte_mot++;
		}
		i++;
		ch = str[i];
	}
	compte_mot++;
	return (compte_mot);
}
