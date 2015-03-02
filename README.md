iterators
=========

Share Market Prediction App using Markov Chains Model


Introduction
============

* Stock market analysis and prediction is one of the interesting areas in which past data could be used to anticipate and predict data and information about future. 
* Using the stochastic process called Markov Chains, we sought out to predict the immediate future stock prices for a few given companies.
* This application is based on PHP and MySql. 



Approach
========

* In this project, we analyzed a year’s worth of stock portfolio for a selected group of companies and apply moving averages and Markov Chains to the data in hopes to predict the stock prices for the near future. 
* The first thing we did was to apply moving averages to create an approximate evaluation of the data. We then found a difference data set to apply Markov Chains to. We took the difference of the closing price and the moving average price. These differences were going to be what we applied Markov Chains to. 
* By applying Markov Chain properties to the data set, we then formed the transition matrix and calculated the steady state probabilities to make the predictions.



Markov Model
============

* The Markov process is a random process characterized as memory less: the next state depends only on the current state and not on the sequence of events that preceded it.
* A sequence of states: X1, X2, X3, … such that
    P(Xk+1 = y|X1 = x1…..,Xk = xk ) = P(Xk+1 = y|Xk = xk)
    P(Xk+1 = y | Xk = x) = P(X2 = y |X1 = x)
* The transition from Xt-1 to Xt depends only on Xt-1 (Markov Property).
* Markov chains are often described by a directed graph, where the edges are labelled by the probabilities of going from one state to the other states.


Steps
=====

* We have selected one year’s worth data for five different stocks and have applied Markov chain calculations on this data in order to make the predictions.
* The first step towards applying Markov chains to the data set began with the calculation of moving averages.
* Moving averages provide a forecast for future prices and therefore are crucial to our work here.  
* Using the difference between the forecasted and actual prices enabled us to make our predictions for the possibility of where future prices may lie. These moving averages were calculated for both opening and closing prices for an interval (called i) of 3 days. 
* After the moving averages were calculated for the set of stock prices, the difference between each actual price and the moving average of each individual day was calculated. This information is what we would use to predict future stock prices. 
* We then focused on binning each of the difference prices into four intervals set within the larger interval from the lowest difference price to the highest difference price. 
* The bins were calculated using the following formula:
K = sqrt(N), where K is the total number of bins and N stands for the total number of readings taken into consideration. 
* The width of each bin is calculated using the following formula,
w = (max value – min value) / K, where ‘max value’ and ‘min value’ refers to the max and min of the difference (between the actual value and the moving average). 
* The intervals were then calculated based on quartile calculations (i.e at intervals of N/4, 2N/4 and 3N/4). 
* Each of the intervals was labelled P1, P2, P3, P4 respectively.

* After the intervals were established for each data set of difference prices, each individual difference price was labelled as to which interval it fell in.
* Once each difference price was labelled with its corresponding interval, the number of transitions for each individual difference price interval to the next difference price interval was counted. The number of points belonging to each interval was also recorded. 
* After this, the transition matrix was developed where each entry of the matrix is supposed to be the probability of the data points moving from, or transitioning from, one state to another, with the states corresponding to the appropriate rows and columns.
* Our transition matrix is of the following form :-

![transition matrix][transition]

[transition]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/transition.png

* Let us say, that our transition matrix is represented by Q.
* We iteratively compute Q2, Q3, Q4, ……., Q8. 
* Then we have considered the steady state probability of being in a particular state as 1, that is, we form 4 steady state probability matrices to tell us the probability or possibility of the stock price lying in a particular range.  The matrices are of the form:
![matrix pic][matrix]

[matrix]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/matrix.png

* Matrix A when multiplied with Q2 , Q3 , ……, Q8  iteratively, finally give us the probability of the stock price lying in interval P1. 
* Similarly when matrix B is multiplied iteratively, it gives the probability of the stock price lying in interval P2, matrix C gives us the probability for interval P3 and D for interval P4 respectively


Implementation
==============

* Firstly, we have taken the historical data from NASDAQ official website for five chosen stocks in the CSV format.
* We have calculated the moving average and differences of the stocks in Excel 2013 and then it was imported into the MySql database.
* All the backend collections like bin, quartiles, transition probabilities and transition matrix was calculated using PHP.
* The whole website has been designed using HTML5, CSS3 and Javascript.
* It is a responsive website so that it can adapt to different screen sizes.
* We have also added the facility to follow the current stock prices which are fetched using Yahoo Finance at runtime.
* We have also added a yahoo finance badge in our website which keeps the user updated about current stock market trends.


Screens of Working Website
==========================

* Index.php (Current stock price of any stock symbol can be entered and the data is shown.)
![Current stock price of any stock symbol can be entered and the data is shown.][screen1]

* get_stock.php (Current stock prices of the entered stock in previous page.)
![Current stock prices of the entered stock in previous page.][screen2]

* index.php (Prediction page where you can select a stock to predict the opening or closing price for tommorow.)
![Prediction page where you can select a stock to predict the opening or closing price for tommorow.][screen3]

* predict.php (Opening price Prediction of the chosen stock for tommorow.)
![Opening price Prediction of the chosen stock for tommorow.][screen4]

* predict.php (Closing price Prediction of the chosen stock for tommorow.)
![Closing price Prediction of the chosen stock for tommorow.][screen5]

* index.php#yahoo (Yahoo finance badge from yahoo api for better analysis of stock data.)
![Yahoo finance badge from yahoo api for better analysis of stock data.][screen6]

* index.php#about (About page for the project)
![About page for the project][screen7]

* index.php#contact (Contact us page for the project)
![Contact us page for the project][screen7]


[screen1]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen1.png
[screen2]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen2.png
[screen3]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen3.png
[screen4]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen4.png
[screen5]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen5.png
[screen6]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen6.png
[screen7]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen7.png
[screen8]: https://github.com/rohitkrai03/iterators/blob/master/docs/screens/screen8.png