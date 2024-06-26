Add an iframe on a different origin somewhere (codepen.io works)

```
<iframe src="http://localhost:8000/" width="90%" height="90%"></iframe>
```

Within the iframe, register, login and navigate to the "Embed" page



Now, in a new tab, visit http://localhost:8000 and confirm you are not currently logged in.

Next, back in the iframe, click the "Obtain Token" button which should then open a new window/tab where you become logged in.
